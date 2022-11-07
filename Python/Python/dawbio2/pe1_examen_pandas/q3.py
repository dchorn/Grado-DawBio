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
# - You can also use the files with solutions of question 2.
# -
# - Now, write a function that obtains all the disease that have registered
# - cases and deaths. 
# - We need to solve this question to resolve question 4, a ranking of
# - disease by death_ratio.
# 
# - Return parameters, in each function:
#   - Return a dataframe
#   - The dataframe must have 4 columns in this order: id,disease,deaths,cases
#   - 
# - Hints:
#   - 1. To make an intersection of 2 dataframe you can use merge function, using the parameter how='inner'
#   - 2. Watch the expected results in the file:
#   - tycho-q3-cases-deaths.csv
#   - 
# - Remember:
#   - Write your solution inside the given function.
#   - Functions must be pure. Remember to delete your print() calls when done.
# -----------------------------------------------------------------------------
def merge_cases_and_deaths(deaths: pd.DataFrame, cases: pd.DataFrame) -> pd.DataFrame:

    df_merged_cases_and_deaths: pd.DataFrame= deaths.merge(cases, how='inner', on="disease")

    df_merged_cases_and_deaths = df_merged_cases_and_deaths.reset_index(drop=True).assign(id=lambda df: df.index)
    df_merged_cases_and_deaths.rename(columns={"number_x": "deaths", "number_y": "cases"}, inplace=True)
    df_merged_cases_and_deaths = df_merged_cases_and_deaths.reindex(columns=['id','deaths', 'cases'])

    return df_merged_cases_and_deaths 

# Main
# -----------------------------------------------------------------------------
if __name__ == "__main__":

    deaths: pd.DataFrame = pd.read_csv("output/tycho-q2-deaths.csv", sep=",")
    cases : pd.DataFrame = pd.read_csv("output/tycho-q2-cases.csv", sep=",")

    merged_cases_and_deaths:  pd.DataFrame = merge_cases_and_deaths(deaths, cases)

    print(merged_cases_and_deaths.head(10))


# -----------------------------------------------------------------------------
