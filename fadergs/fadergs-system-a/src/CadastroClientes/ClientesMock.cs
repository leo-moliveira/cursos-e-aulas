using CadastroClientes.Aplicacao;
using CadastroClientes.Entidades;
using CadastroClientes.Enumerados;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CadastroClientes
{
    public class ClientesMock
    {
        private Cliente NovoMock(string nome, string dataNasc, string estadoCivil, string sexo, string rg, string cpf, string pais, string estado, string cidade, string bairro,
            string cep, string logradouro, string complemento, int numero, int telefone1, int telefone2, int celular1, int celular2) {
            Cliente cliente = new Cliente();                      

            eEstadoCivil eEstCivil = (eEstadoCivil)Enum.Parse(typeof(eEstadoCivil), estadoCivil);

            cliente.NomeCompleto = nome;
            cliente.DataNascimento = DateTime.Parse(dataNasc);
            cliente.EstadoCivil = (int)eEstCivil;
            cliente.Sexo = sexo;
            cliente.RG = long.Parse(rg);
            cliente.CPF = long.Parse(cpf);
            cliente.Pais = pais;
            cliente.Estado = estado;
            cliente.Cidade = cidade;
            cliente.Bairro = bairro;
            cliente.CEP = cep;
            cliente.Logradouro = logradouro;
            cliente.Complemento = complemento;
            cliente.Numero = numero;
            cliente.listaTelefones.Add(telefone1.ToString());
            cliente.listaTelefones.Add(telefone2.ToString());
            cliente.listaTelefones.Add(celular1.ToString());
            cliente.listaTelefones.Add(celular2.ToString());

            //cliente.TelefoneFixo1 = telefone1;
            //cliente.TelefoneFixo2 = telefone2;
            //cliente.Celular1 = celular1;
            //cliente.Celular2 = celular2;
            cliente.DataRegistro = Util.ObterDataAtual();

            return cliente;
        }

        public Cliente CarregarInformacoesMocadas(string nomeCliente) {
            Cliente cliente = new Cliente();

            switch (nomeCliente) {
                case "Érico Verissimo":
                    cliente = NovoMock("Erico Lopes Verissimo", "17/12/1905", "Casado", "Masculino", "462748066", "17966177092", "Brasil", "Rio Grande do Sul", "Cruz Alta", "Malheiros",
                        "98015-130", "R. Gen. Osório", "Casa Museu", 380, 549874545, 553211121, 519800000, 0);
                    break;
                case "Jorge Amado":
                    cliente = NovoMock("Jorge Leal Amado de Faria", "10/08/1912", "Casado", "Masculino", "270705636", "30622528041", "Brasil", "Bahia", "Itabuna", "São Lourenço",
                      "45602-696", "1ª Travessa A", "Casa", 10, 74874545, 735321121, 719800000, 0);
                    break;
                case "Lygia Fagundes Telles":
                    cliente = NovoMock("Lygia Fagundes da Silva Telles", "19/04/1923", "Viúvo", "Feminino", "347143702", "76587266053", "Brasil", "São Paulo", "São Paulo", "Ipiranga",
                      "04209-901", "Rua do Manifesto", "Casa", 1183, 11874545, 115321121, 11984100, 0);
                    break;
            }

            return cliente;
        }
    }
}