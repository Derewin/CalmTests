## Caso 1: SysBancario

### Armar un sistema bancario que respete los siguientes requisitos:

- Una cuenta tendrá un titular.
- Una cuenta permitirá ingresar y retirar dinero, y ver la información asociada a la misma.
- Una cuenta corriente tiene un porcentaje de interés asociado y un descubierto autorizado (descubierto = saldo negativo permitido en la cuenta).
- Una cuenta sueldo tiene un límite para retirar dinero
- Para la cuenta corriente, queremos además calcular interés con respecto al saldo según el tiempo transcurrido (en meses)

### Incluir tests probando el correcto funcionamiento del sistema. No olvidar incluir los casos bordes.

## Notas

De momento referencié tipos de cuenta con AccountType sin embargo crearía una base de datos con los listados de tipos disponibles para poder en un futuro seguir agregando tipos de cuenta, (a planificar referenciación de sus propiedades por archivo, clase o base de datos)
