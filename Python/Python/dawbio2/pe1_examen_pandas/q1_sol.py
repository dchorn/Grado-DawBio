# Imports
import pandas  as pd

# -----------------------------------------------------------------------------
# Student name: DENYS CHORNY
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
# Question: fix_broken_tycho()
# -----------------------------------------------------------------------------
# 
# - You are given a broken Tycho dataset. Write a function to fix it.
# - The function fix_broken_tycho() must do the following:
#  Done - 1. Drop 'country' and 'url' columns
#  Done - 2. Cleanup the diseases removing the descriptions in square brackets, we don't need it. (See hint below)
#  Done - 3. Sort the dataframe by epi_week and state in alphabetical order (oldest weeks first, state order A-Z)
#  Done - 4. Add a new column called 'year' of type 'int' with the year from the epi_week.
#  Done - 5. Select rows where the years are between 1931 and 1936.
#  Done - 6. Select the rows with value 'CITY' in the column named loc_city. 
#  Done - 7. Add a new column called 'id' with a numerical unique identifier starting from 0
# 
# - Return parameters:
#   - Return the fixed entries as a dataframe.
#   - This dataframe must have this columns, in this order:
#   - ['id','epi_week', 'year', 'from_date', 'to_date', 'state', 'city', 'event', 'disease', 'number']
# 
# - Hints:
#   Step2.
#   <dataframe>.str.replace(pat=r' \[.*\]', repl='', regex=True)
#   Step5. You can use masks or this function:
#   <dataframe>.query( min_year <= year <= max_year )
# 
# - Remember:
#   - Write your solution inside the given function.
#   - Functions must be pure. Remember to delete your print() calls when done.
#   - Run pytest to be sure you succeeded.
# -----------------------------------------------------------------------------


# -----------------------------------------------------------------------------
def get_year(epi_week: int) -> int:

    epi_week_str: str = str(epi_week)
    year_str:     str = epi_week_str[0:4]
    year_int:     int = int(year_str)

    return year_int


# -----------------------------------------------------------------------------
def fix_broken_tycho(entries: pd.DataFrame) -> pd.DataFrame:
    fixed_entries: pd.DataFrame = (entries)

    fixed_entries: pd.DataFrame = (entries.drop(columns=['country', 'url']))

    fixed_entries.loc[:,'disease'] = fixed_entries.loc[:,'disease'].str.replace(pat=r' \[.*\]', repl='', regex=True)

    fixed_entries.loc[:,'year'] = fixed_entries.loc[:,'epi_week'].map(get_year)

    years_range_mask = (fixed_entries.loc[ : , 'year' ] > 1930) & (fixed_entries.loc[ : , 'year'] < 1937)
  
    city_mask = (fixed_entries.loc[:, 'loc_type'] == 'CITY')

    fixed_entries = fixed_entries.loc[years_range_mask, : ]
    fixed_entries = fixed_entries.loc[city_mask, :].sort_values(by=['epi_week', 'state'])

    fixed_entries = fixed_entries.reset_index(drop=True).assign(id=lambda df: df.index)
    fixed_entries = fixed_entries.reindex(columns=['id','epi_week', 'year', 'from_date', 'to_date', 'state', 'city', 'event', 'disease', 'number'])
    

    return fixed_entries


# Main
# -----------------------------------------------------------------------------
if __name__ == "__main__":

    broken_entries: pd.DataFrame = pd.read_csv("data/tycho-broken.csv", sep=",")
    fixed_entries:  pd.DataFrame = fix_broken_tycho(broken_entries)
    
    print(fixed_entries.head(20))

# -----------------------------------------------------------------------------
