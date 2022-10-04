# np -> numerical panda, used to do numeric calculations 
# pd -> pandas library, used to procces information in a table mode.
import numpy as np
import pandas as pd
from IPython.display import display


# Pandas uses 2 tipes of data.
# 1. Series -> They are like normal lists.
# 2. DataFrames -> It is a table of data, or a bunch of lists.

# 1. **data.** Ha de cubrir tots els possibles continguts de la sèrie. Habitualment se li passa una llista plena.
# 2. **dtype** Contingut dels valors de les dades. Inicialment tots del mateix tipus.
# 3. **index.** L'índex el pots configurar al teu gust. Per defecte és numèric, però podem elegir d'un altre tipus segons el cas.

# Example of Series: Creating a table of students taht want to do an internship
names_list = ["John", "Mary", "Lucy", "Peter"]
grades_ser = [7,9,8,4]
wants_dual_ser = [False, True, False, True]

#creating a DataFrame
my_dict = {'Name' : ["John", "Mary", "Lucy", "Peter"],
        'Grades' : [7,9,8,4],
        'Dual' : [False, True, False, True]}

another_dict = {'name':names_list,'grades':grades_ser, "dual":wants_dual_ser}

df = pd.DataFrame(another_dict)

# displaying the DataFrame
# display(df)

#les notes de dawbio amb series
student_list=["John","Mary","Lucy","Peter"]
grades_list = [7,9,8,4]
wants_dual_list = [False,True,False,True]
#index canviats a índex d'estudiants
ser = pd.Series(data=grades_list,index=student_list)

display(ser)
