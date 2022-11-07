# Imports
import pandas  as pd

# -----------------------------------------------------------------------------
# Student name: WRITE YOUR NAME HERE
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
# Question: get_total_deaths()
# -----------------------------------------------------------------------------
# 
# - You are given the fixed Tycho dataset.
# -
# - Now, write a function that save all the data of the rows that have an
# - epi_week equal to 53.
# 
# - Return parameters, in each function:
#   - Return a dataframe, with all the rows that have an epi_week equal to 53.
#   - 
# - Hints:
#   - epi_week field 2 last characters indicate the week. 
#   - One of the years which has 53 weeks is 1936.
#   - 
# - Remember:
#   - Write your solution inside the given function.
#   - Functions must be pure. Remember to delete your print() calls when done.
# -----------------------------------------------------------------------------
def get_year(epi_week: int) -> int:

    epi_week_str: str = str(epi_week)
    year_str:     str = epi_week_str[4:6]
    year_int:     int = int(year_str)

    return year_int

def get_rows_53_epi_week(entries: pd.DataFrame) -> pd.DataFrame:
    rows_53_epi_week: pd.DataFrame = (entries)


    rows_53_epi_week.loc[:,'week'] = rows_53_epi_week.loc[:,'epi_week'].map(get_year)


    week_mask = entries.loc[ : ,'week'] == 53 

    rows_53_epi_week = (entries.loc[week_mask,:])

    rows_53_epi_week = rows_53_epi_week.drop(columns='week')


    return rows_53_epi_week



# Main
# -----------------------------------------------------------------------------
if __name__ == "__main__":

    entries: pd.DataFrame = pd.read_csv("data/tycho-fixed.csv", sep=",")

    rows_53_epi_week:  pd.DataFrame = get_rows_53_epi_week(entries)

    print(rows_53_epi_week.head(10))


# -----------------------------------------------------------------------------
