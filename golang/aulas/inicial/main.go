package main

import "fmt"

func init() {
	//executa na inicialização proximo do construct
}

func main() {
	/*
															var peso int
															peso = 10
															hello := "Hello World"
															fmt.Println("---\n" +
																hello +
																"\n---")

														var texto string
														var numero int
														var metro float32
														var ehFeminino bool

														fmt.Println(texto)
														fmt.Println(numero)
														fmt.Println(metro)
														fmt.Println(ehFeminino)

													num1 := "texto 1"
													num2 := "texto 2"

													result := num1 + num2
													fmt.Println(result)
													fmt.Println(reflect.TypeOf(result))


												const taxa = 10
												//taxa = 10
												fmt.Println(taxa)
												fmt.Println(reflect.TypeOf(taxa))


											var number uint8
											number = 255
											var numberInt int
											numberInt = int(number)
											fmt.Println(numberInt)

											b, _ := strconv.ParseBool("True")
											//fmt.Println(err)
											fmt.Printf("%T \n", b)
											fmt.Println(b)


										salario := 900.00
										tipo := "PJ"
										//var salarioMaisObonus float64
										//salarioMaisObonus = salario

										if salario < 1000 && tipo == "CLT" {
											salario -= (salario * 0.08)
										} else if salario < 1000 && tipo == "PJ" {
											salario -= (salario * 0.05)
										} else if salario <= 1200 {
											salario -= (salario * 0.10)
										} else {
											salario -= (salario * 0.15)
										}

										fmt.Println("Salário: ", salario)

										var ehCarro = false
										var valorDoAutomovel = 1000.00

										if ehCarro {
											valorDoAutomovel += 55.50
										} else {
											valorDoAutomovel += 20
										}

										//fmt.Println("Valor do Automovel: ", valorDoAutomovel)


									for i := 0; i < 10; i++ {
										fmt.Println(i)
									}

								texto := "palavra"

								fmt.Println("Quantidade: ", len(texto))

								for i := 0; i < len(texto); i++ {
									if string(texto[i]) == "r" {
										continue
									}
									fmt.Println(string(texto[i]))
								}

							//não exite while usase for
							texto := "palavra"
							tamanho := len(texto)
							i := 0
							for i < tamanho {
								if string(texto[i]) == "r" {
									i++
									continue
								}
								fmt.Println(string(texto[i]))
								fmt.Println(i)
								i++
							}
							fmt.Println("fim")
						for numBase := 1; numBase <= 10; numBase++ {
							for multiplicado := 1; multiplicado <= 10; multiplicado++ {
								fmt.Println(numBase, " x ", multiplicado, " = ", numBase*multiplicado)
							}
						}



					lista := []int{4, 9, 6, 7}

					for i, v := range lista {
						fmt.Println(i, " => ", v)
					}
					//fmt.Println("Lista :", lista)
					fmt.Println("tamanho :", len(lista))


				lista := []int{4, 9, 6, 7}

				fmt.Println("Lista: ", lista)
				fmt.Println("Lista pos1: ", lista[0])
				fmt.Println("Lista pos1: ", lista[1])
				fmt.Println("Lista pos1: ", lista[2])
				fmt.Println("Tamanho: ", len(lista))

				lista = append(lista, 8)
				fmt.Println("Tamanho: ", len(lista))

				listaDeString := []string{"golang", "C#", "cocoJava"}
				listaDeString = append(listaDeString, "PHP > Java")
				fmt.Println("Lista: ", listaDeString)

			lista := make([]int, 1)
			lista = append(lista, 1)
			lista = append(lista, 2)
			lista = append(lista, 6)
			fmt.Printf("%T\n", lista)
			fmt.Println(len(lista))

			somaTotal := 0
			for i := 0; i < len(lista); i++ {
				fmt.Println(lista[i])
				somaTotal += lista[i]
			}

			fmt.Println("Média: ", somaTotal/len(lista))



		//sublista
		var listaToda = []int{2, 10, 9, 4, 5, 8, 1, 3}
		var listaMenorQueCinco = make([]int, 0)
		for i := 0; i < len(listaToda); i++ {
			if listaToda[i] < 5 {
				listaMenorQueCinco = append(listaMenorQueCinco, listaToda[i])
			}
		}
		fmt.Println(listaMenorQueCinco)

		segundalista := listaToda[:3]
		terceiralista := listaToda[4:]
		ultimoItem := listaToda[len(listaToda)-1:]
		fmt.Println(segundalista)
		fmt.Println(terceiralista)
		fmt.Println(ultimoItem)

	*/

	//slice vs arr
	/*
		slice tamanho nao definido, arry tem tamanho definido
	*/

	/*
	* Maps
	 */
	/*
				m := map[string]int{"sp": 10000000, "cg": 9000000}
				m2 := make(map[string]int)

				m2["rs"] = 700000
				m["rj"] = 700002

				valor, existe := m["rj"]

				fmt.Println(m)
				fmt.Println(m2)

				if valor2, foiEncontrado := m["rj"]; foiEncontrado {
					fmt.Println("valor2", valor2)
				}

				if existe {
					fmt.Println(valor)
				} else {
					fmt.Println("não existe")
				}

				delete(m, "rj")
				for chave, valor := range m {
					fmt.Println("Cidade: ", chave, "H: ", valor)
				}

			arrInt := [2]int{2, 4}
			var soma int = arrInt[0] + arrInt[1]

			soma = 0

			for i := 0; i < len(arrInt); i++ {
				soma += arrInt[i]
			}

			fmt.Println(soma)


		sliceInt := []int{2, 8, 3, 10, 5, 4, 7, 9, 1}

		somaMenorQueCinco := 0
		somaMaiorQueCinco := 0

		for _, valor := range sliceInt {
			if valor >= 1 && valor <= 5 {
				somaMenorQueCinco += valor
			} else {
				somaMaiorQueCinco += valor
			}
		}
		fmt.Println(sliceInt)
		fmt.Println("Soma Maior que 5: ", somaMaiorQueCinco)
		fmt.Println("Soma Mmenor que 5: ", somaMenorQueCinco)
	*/
	//imprimeMSG("teste")

	//fmt.Println(soma(1, 2))

	//soma, sub, div, mult := operacao(2, 4)
	//sum, sub, div, mult := operacao2(2, 4)

	//fmt.Println(soma, sub, div, mult)
	//fmt.Println(sum, sub, div, mult)

}

func imprimeMSG(msg string) {
	msg = "Hello!! " + msg
	fmt.Println(msg)
}

func soma(num1 int, num2 int) int {
	result := num1 + num2
	return result
}

func operacao(num1 int, num2 int) (int, int, int, int) {
	soma := num1 + num2
	subTracao := num1 - num2
	divisao := num1 / num2
	multi := num1 * num2
	return soma, subTracao, divisao, multi
}

func operacao2(num1 int, num2 int) (sum int, sub int, div int, multi int) {
	sum = num1 + num2
	sub = num1 - num2
	div = num1 / num2
	multi = num1 * num2
	return
}
