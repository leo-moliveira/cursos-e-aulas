package main

import (
	"fmt"
	"math"
)

type geometrica interface {
	area() float64
}

func (r retangulo) area() float64 {
	return r.largura * r.altura
}

func (c circulo) area() float64 {
	return math.Pi * c.radius * c.radius
}

type retangulo struct {
	largura, altura float64
}

type circulo struct {
	radius float64
}

func ExibirGeometria(g geometrica) {
	fmt.Println(g.area())
}

func ExibirError(e error) {
	fmt.Println(e.Error())
}

type ProblemaDeNetwork struct {
	rede     bool
	hardware bool
}

func (p ProblemaDeNetwork) Error() string {
	if p.rede {
		return "Problema de rede"
	} else if p.hardware {
		return "Problema de hardware"
	} else {
		return "Outro problema"
	}
}

func main() {

	fmt.Println("Iniciando ....")
	/*
			retangulo := retangulo{
				largura: 1,
				altura:  2,
			}

			circulo := circulo{
				radius: 3,
			}

			ExibirGeometria(retangulo)

			ExibirGeometria(circulo)



		//var err error

		///err = errors.New("Teste")

		//fmt.Println(err)

		ExibirError(errors.New("Teste"))

		p := ProblemaDeNetwork{
			rede:     false,
			hardware: false,
		}

		ExibirError(p)

	*/

	//diferentes tipos de em um slice
	var lista []interface{}

	//a = 5

	//a = circulo{radius: 10}
	lista = append(lista, 10)
	lista = append(lista, 7.55)
	lista = append(lista, true)
	lista = append(lista, "teste")

	for _, valor := range lista {

		if v, ok := (valor.(string)); ok {
			fmt.Println(v + " - string")
		} else {
			fmt.Println(valor)
		}

	}
}
