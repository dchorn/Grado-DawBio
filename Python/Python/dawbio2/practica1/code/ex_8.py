## IMPORTS:
## --------------------------------------------------------

import matplotlib.pyplot as plt
import pandas       as pd


df = pd.DataFrame = pd.read_csv("./db/cut_Influenza.csv", sep=",")

grouped = df.groupby(by=['INFLUENZA_SEASON'])['HOSP_FLU_ICU_WEEKLY'].sum()

grouped.plot(kind="bar")

##Output:
## --------------------------------------------------------
##print(grouped)
plt.show()

