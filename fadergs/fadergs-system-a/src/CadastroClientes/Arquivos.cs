using CadastroClientes.Aplicacao;
using CadastroClientes.Entidades;
using CsvHelper;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Globalization;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CadastroClientes
{
    public class Arquivos
    {
        public void ExportarListaParaCSV<T>(List<T> listaObj) {
            var dataHora = Util.ObterDataAtual();
            var dataHoraFormatoCSV = dataHora.ToString("yyyyMMddhhmmss");
            var nomeArquivo = $"ListaClientes{dataHoraFormatoCSV}.csv";
            var csvArquivoCaminho = Path.Combine(Environment.CurrentDirectory, nomeArquivo);

            using (FileStream fileStream = new FileStream(csvArquivoCaminho, FileMode.OpenOrCreate)) {
                using (var writer = new StreamWriter(fileStream, Encoding.GetEncoding("ISO-8859-1")))
                using (var csv = new CsvWriter(writer, CultureInfo.InvariantCulture)) {
                    writer.Write("Telefone1,");
                    writer.Write("Telefone2,");
                    writer.Write("Celular1,");
                    writer.Write("Celular2,");
                    csv.WriteHeader<Cliente>();
                    csv.NextRecord();

                    List<Cliente> listaCliente = new List<Cliente>();
                    listaCliente = (List<Cliente>)(Object)listaObj;

                    foreach (var cliente in listaCliente) {
                        writer.Write($"{cliente.listaTelefones[0]},{cliente.listaTelefones[1]},{ cliente.listaTelefones[2]},{cliente.listaTelefones[3]}");
                        csv.WriteRecord(cliente);
                        csv.NextRecord();
                    }
                }
            }
        }

        public string[] ObterLinhasArquivoTXT(string CaminhoArquivo) {
            string[] linhas = File.ReadAllLines(CaminhoArquivo);

            return linhas;
        }
    }
}
