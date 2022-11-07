# Imports
import pandas  as pd

# -----------------------------------------------------------------------------
# Student name: DENYS CHORNY 
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
# Question: get_total_deaths()
# -----------------------------------------------------------------------------
# 
# - You are given the fixed Tycho dataset.
# - Write two functions: 
# - get_total_cases
# - View the ranking of diseases by number of total cases. 
# - get_total_deaths
# - View the ranking of diseases by number of total deaths. 
# 
# - Return parameters, in each function:
#   - Return a dataframe
#   - The dataframe must have 2 columns in this order: disease, number
#   - 
# - Hints:
#   - Watch the expected results in files:
#   - tycho-q2-cases.csv
#   - tycho-q2-deaths.csv
#   - 
# - Remember:
#   - Write your solution inside the given function.
#   - Functions must be pure. Remember to delete your print() calls when done.
# -----------------------------------------------------------------------------

def get_total_cases(entries: pd.DataFrame) -> pd.DataFrame:
    df_total_cases: pd.DataFrame = (entries)

    cases_mask = entries.loc[ : ,'event'] == 'CASES' 

    df_total_cases= (entries.loc[cases_mask,['disease', 'number']]
                .groupby(by=['disease']).sum()
                .reset_index()
                .assign(ranking=lambda df: df.index + 1)
    )
   #  entries.loc[:, ['num_deaths']].sum() => counts

    df_total_cases= df_total_cases.reindex(columns=['disease', 'number']).sort_values('number', ascending=False)
    df_total_cases = df_total_cases.reset_index(drop=True)
    
    return df_total_cases


def get_total_deaths(entries: pd.DataFrame) -> pd.DataFrame:
    df_total_deaths: pd.DataFrame = (entries)


    death_mask = entries.loc[ : ,'event'] == 'DEATHS' 

    df_total_deaths = (entries.loc[death_mask,['disease', 'number']]
                .groupby(by=['disease']).sum()
                .reset_index()
                .assign(ranking=lambda df: df.index + 1)
    )
   #  entries.loc[:, ['num_deaths']].sum() => counts

    df_total_deaths = df_total_deaths.reindex(columns=['disease', 'number']).sort_values('number', ascending=False)
    df_total_deaths = df_total_deaths.reset_index(drop=True)

    return df_total_deaths


# Main
# -----------------------------------------------------------------------------
if __name__ == "__main__":

    entries: pd.DataFrame = pd.read_csv("data/tycho-fixed.csv", sep=",")

    ranking_cases:  pd.DataFrame = get_total_cases(entries)

    ranking_deaths:  pd.DataFrame = get_total_deaths(entries)

    print(entries.dtypes)


# -----------------------------------------------------------------------------
