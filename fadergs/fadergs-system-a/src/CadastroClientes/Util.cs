using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CadastroClientes.Aplicacao
{
    public static class Util
    {
        public static DateTime ObterDataAtual() {
            return DateTime.Now;
        }

        public static void AbrirForm<T>() where T : Form, new() {
            new T().Show();
        }

        public static void LimparCampoSexo(GroupBox gbSexo) {
            gbSexo.Controls.OfType<RadioButton>().FirstOrDefault(rb => rb.Checked = true).Checked = false;
        }

        public static void MarcarCampoSexo(GroupBox gbSexo, string sexo) {
            gbSexo.Controls.OfType<RadioButton>().FirstOrDefault(rb => rb.Text == sexo).Checked = true;
        }

        public static string ObterSexoExtenso(string letraInicial) {
            string sexo = "";

            switch (letraInicial) {
                case "F":
                    sexo = "Feminino";
                    break;
                case "M":
                    sexo = "Masculino";
                    break;
                case "O":
                    sexo = "Outro";
                    break;
            }

            return sexo;
        }

        public static string ObterSexoSelecionado(GroupBox gbSexo) {
            Notificacoes notificacoes = new Notificacoes();

            try {
                RadioButton radioButtonsSexo = (RadioButton)gbSexo.Controls.OfType<RadioButton>().FirstOrDefault(rb => rb.Checked);
                return radioButtonsSexo.Text;
            } catch {
                notificacoes.Nova("Não foi possível selecionar uma opção para o campo Sexo!", "Sexo Não Selecionado");
            }
            notificacoes = null;

            return "";           
        }

        public static void CarregarComboEstadoCivil(ComboBox comboEstadoCivil) {
            comboEstadoCivil.Items.Add("Solteiro");
            comboEstadoCivil.Items.Add("Casado");
            comboEstadoCivil.Items.Add("Separado");
            comboEstadoCivil.Items.Add("Divorciado");
            comboEstadoCivil.Items.Add("Viúvo");
        }

        public static void HandleNotificacoesEvent(object sender, NotificacoesEventArgs e) {
            MessageBox.Show(e.Mensagem,e.Titulo);
        }
    }
}
