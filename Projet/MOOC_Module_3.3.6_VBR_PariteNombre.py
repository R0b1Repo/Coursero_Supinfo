"""
    Auteure : Solange bodin
    Date : 15/12/2021
    Difficulté : VBR
    But du progamme : 
        Écrire un programme qui teste la parité d’un nombre entier lu
        sur input et imprime True si le nombre est pair, False dans le
        cas contraire.
"""

# choix de l'entier par l'utilisteur
a = int(input())
# nombre impair
if a % 2 :
    print("False")
# nombre pair
else :
    print("True")
