
import csv
import pprint as pp

csv_file_path = "./scimago_medicine.csv"

# transform the csv into an array dictionary. 
def read_csv_file(csv_file_path: str) -> list:
    with open(csv_file_path, newline='') as csvfile:
        csv_reader = csv.DictReader(csvfile, delimiter=";")
        result = [row_dict for row_dict in csv_reader]

        return result

# store the dictionary into a variable
entries = read_csv_file(csv_file_path)
 
print("scimago-medicine have: %d entries." % (len(entries)))
print("The first 25 entries are:")

# Read first 25 entries
i: int = 1
for i in range(25):  
    print("Entrie number:  %d" % (i+1))
    pp.pp(entries[i])

# search for the country 'Spain' and print how mny entries there are.
total: int = len([entry for entry in entries if entry['Country'] == 'Spain'])
print(total)

#Show all the journals (Type = journal) published in UK 
#(Country = United Kingdom) with an H-Index greater than 200.
pp.pp([entry for entry in entries if entry['Type'] == 'journal' 
       if entry['Country'] == 'United Kingdom' if int(entry['H index']) >= 200])
