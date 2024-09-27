
frutas = {
    'Platano': 1.35,
    'Manzana': 0.80,
    'Pera': 0.85,
    'Naranjas': 0.70
}

fruta = input("Ingrese el nombre de la fruta: ").title()
kilo = float(input("Ingrese el número de kilos: "))

if fruta in frutas:

    total = frutas[fruta] * kilo
    print(f"El precio de {kilo} kilos de {fruta} es: {total} pesos")
else:
    print("Lo siento, la fruta no está en la lista.")
