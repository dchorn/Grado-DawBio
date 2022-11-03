## IMPORTS:
## --------------------------------------------------------

import matplotlib.pyplot as plt
import numpy        as np
import pandas       as pd

## Creating all the variables needed to create the DataFrame:
student_names_list:     list[str]       = ['Laura', 'Pep', 'Irene', 'Xavi', 'Flavia',
                                           'Pau', 'Antonia', 'Joan', 'Gemma', 'Pedro']

students_grade:         list[int]       = [2, 4, 10, 7, 5, 3, 6, 9, 8, 1]

students_age:           list[int]       = [21, 24, 22, 17, 33, 34, 36, 19, 28, 31]

want_dual:              list[bool]      = [True, False, True, False, True,
                                           False, True, False, True, False]

students_gender:        list[str]       = ['Female', 'Male', 'Female', 'Male', 'Female',
                                           'Male', 'Female', 'Male', 'Female', 'Male']

students_city:          list[str]       = ['Esplugues Ll.', 'Barcelona', 'Barcelona', 'Lleida', 'Sicilia',
                                           'Girona', 'Barcelona', 'Tarragona', 'Vic', 'Terrassa']

students_data:          dict            = {'grade':    students_grade,
                                           'age':      students_age,
                                           'dual':     want_dual,
                                           'gender':   students_gender,
                                           'city':     students_city}

## Creating the DataFrame
student_names_serie:    pd.Series       = pd.Series(student_names_list)
students_df:            pd.DataFrame    = pd.DataFrame(data = students_data, index = student_names_serie)

## MAIN:
## --------------------------------------------------------
## --------------------------------------------------------

## EXERCICES:
## --------------------------------------------------------

## --------------------------------------------------------
## 1 Grades plot
## --------------------------------------------------------

# bar_plot = students_df.loc[:, 'grade'].plot(kind='bar')

## --------------------------------------------------------
## 2 Ages plot
## --------------------------------------------------------

# students_df.loc[:, 'age'].plot(kind='pie')

## --------------------------------------------------------
## 3 Sorted grade plot
## --------------------------------------------------------

# students_df.loc[:, 'grade'].sort_values(ascending=True).plot(kind="bar")

## --------------------------------------------------------
## 4 Random DataFrame with numpy and plot with matplotlib
## --------------------------------------------------------

min_value_age  = 10
min_value_nota  = 1
max_value       = 100
random_df       = pd.DataFrame({'age':      np.random.randint(min_value_age, max_value, 100),
                                'grade':    np.random.randint(min_value_nota, max_value, 100)})

# random_df.loc[:, 'grade'].plot(kind="pie")

## --------------------------------------------------------
## 5 Line plot. If you don't say the typ eof plot it draw a line plot
## --------------------------------------------------------
# students_df.loc[:, 'grade'].plot(title="Age and grades", legend=True)

students_df.plot()



## Output:
## --------------------------------------------------------

plt.show()



