def correct_parity(param_number:int):
    return (param_number%2==0)


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
    list_result.append(test(correct_parity(2), module.parity(2)))
    list_result.append(test(correct_parity(10), module.parity(10)))
    list_result.append(test(correct_parity(-1), module.parity(-1)))
    list_result.append(test(correct_parity(-2), module.parity(-2)))
    list_result.append(test(correct_parity(11123456789), module.parity(11123456789)))

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


