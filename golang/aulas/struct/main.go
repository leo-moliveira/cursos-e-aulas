package main

import (
	"fmt"
	"goLangStruct/model"
)

func main() {
	/*
		endereco := model.Endereco{
				Rua:    "Rua X",
				Numero: 15,
				Cidade: "Campo Grande",
			}
			pessoa := model.Pessoa{
				Nome:             "Leonardo",
				Endereco:         endereco,
				DataDeNascimento: time.Date(1990, 1, 31, 0, 0, 0, 0, time.Local),
			}
			//fmt.Println("Iniciando...")
			fmt.Println(endereco)
			endereco.Numero = 18
			fmt.Println(endereco.Numero)

			fmt.Println(pessoa)

			idade := model.CalculaIdade(pessoa)
			fmt.Println("Idade => ", idade)
			fmt.Println("Idade => ", pessoa.IdadeAtual())
			pessoa.CalculaIdade2()
			fmt.Println("Idade => ", pessoa.Idade)
	*/

	fmt.Println("Iniciando ....")

	automovelMoto := model.Automovel{
		Ano:    2022,
		Placa:  "XPTO",
		Modelo: "CG",
	}

	moto := model.Moto{
		Automovel:   automovelMoto,
		Cilindradas: 125,
	}

	fmt.Println(moto)
	fmt.Println(moto.Modelo)

}
