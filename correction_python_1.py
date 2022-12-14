def average(a, b):
    return (a + b) / 2


def test(fct1, fct2):
    """
    :param fct1 fct2: One is the good file, the other is the user file
    :return: True if both functions gives the same result ,else False
    """
    if fct1 == fct2:
        return "True"
    return "False"


def main():
    """
    Import user file, then test it and assert a grade based on the percent of good results
    :return grade (float): score of all tests in %
    """

    # To import the file given in argument in command line
    # Exemple: python3 correction_pyhton_1.py user_file_to_import
    from importlib import import_module
    import sys
    module_name = sys.argv[1]
    module = import_module(module_name)
    #------------------------------------------------

    list_result = []
    good = 0

    # Some tests
    list_result.append(test(average(1, 2), module.avg(1, 2)))
    list_result.append(test(average(0, 10), module.avg(0, 10)))
    list_result.append(test(average(-1, 2), module.avg(-1, 2)))
    list_result.append(test(average(-2, 2), module.avg(-2, 2)))

    # Calcul result
    for element in list_result:
        if element == "True":
            good += 1
            
    grade = (good / len(list_result)) * 100
    return grade


if "__name__" == "__main__":
    print(main())
else:
    print(main())
