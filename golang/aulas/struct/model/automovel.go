package model

type Automovel struct {
	Ano    int
	Placa  string
	Modelo string
}

type Moto struct {
	Automovel
	Cilindradas int
}

type carro struct {
	Automovel
	Portas         int
	Potencia       int
	ArCondicionado bool
}
