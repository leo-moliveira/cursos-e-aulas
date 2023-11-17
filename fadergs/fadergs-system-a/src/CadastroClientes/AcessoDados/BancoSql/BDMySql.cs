using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CadastroClientes.AcessoDados.BancoSql
{
    public class BDMySql
    {
        private string _connectionString;
        private string ConnectionString {
            get { return ObterConnectionString(); }
            set {
                _connectionString = value;
            }
        }

        public void Executar(string ComandoSql) {
            MySqlConnection Conexao = Conectar();
            MySqlCommand Comando = new MySqlCommand();

            try {
                Comando.Connection = Conexao;

                Comando.CommandText = ComandoSql;
                Comando.ExecuteNonQuery();
            } catch (Exception ex) {
                MessageBox.Show(ex.Message);
            } finally {
                Conexao.Close();
            }
        }

        public MySqlConnection Conectar() {
            MySqlConnection Conexao = null;
            MySqlCommand Comando = new MySqlCommand();

            try {
                Conexao = new MySqlConnection(ConnectionString);
                Comando.Connection = Conexao;
                if (Conexao.State == ConnectionState.Closed)
                    Conexao.Open();
            } catch (Exception ex) {
                MessageBox.Show(ex.Message);
            } finally {
            }

            return Conexao;
        }

        public DataTable ObterDataTable(string ComandoSql) {
            MySqlConnection Conexao = null;
            MySqlCommand Comando = new MySqlCommand();
            MySqlDataAdapter DataAdapter = new MySqlDataAdapter();
            DataTable DataTable = null;
            DataSet DataSet;

            try {
                //Conexao = new MySqlConnection(ConnectionString);
                Conexao = Conectar();
                Comando = new MySqlCommand(ComandoSql, Conexao);

                DataAdapter = new MySqlDataAdapter(Comando);
                DataSet = new DataSet();
                DataTable = new DataTable();
                DataAdapter.Fill(DataTable);
            } catch (Exception ex) {
                MessageBox.Show(ex.Message);
                Conexao.Close();
            } finally {               
            }

            return DataTable;
        }

        private string ObterConnectionString() {
            var txtArquivoCaminho = Path.Combine(Environment.CurrentDirectory, "Banco.txt");
            var conString = "";

            if (!File.Exists(txtArquivoCaminho)) return "";

            Arquivos arquivos = new Arquivos();
            string[] linhas = arquivos.ObterLinhasArquivoTXT(txtArquivoCaminho);

            foreach (var linha in linhas) {
                conString = $"{conString}{linha}";
            }

            return conString;
        }
    }
}