using CadastroClientes.Aplicacao;
using CadastroClientes.Entidades;
using CadastroClientes.Enumerados;
using CadastrodeClientes;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CadastroClientes.Forms
{
    public partial class frmMockClientes : Form
    {
        public frmMockClientes() {
            InitializeComponent();
        }

        private void frmMockClientes_Load(object sender, EventArgs e) {
            CarregarCombo();
        }

        private void CarregarCombo() {         
            comboClienteMocados.Items.Add("Jorge Amado");
            comboClienteMocados.Items.Add("Lygia Fagundes Telles");
            comboClienteMocados.Items.Add("Érico Verissimo");
        }

        private void comboClienteMocados_SelectionChangeCommitted(object sender, EventArgs e) {
            frmCadClientes frmCadClientes = new frmCadClientes();
            Cliente cliente = new Cliente();
            ClientesMock clienteMock = new ClientesMock();
            
            cliente = clienteMock.CarregarInformacoesMocadas(comboClienteMocados.SelectedItem.ToString());

            eEstadoCivil eEstCivil = (eEstadoCivil)cliente.EstadoCivil;

            frmCadClientes.txtNome.Text = cliente.NomeCompleto;
            frmCadClientes.mtxtDataNascimento.Text = cliente.DataNascimento.ToShortDateString();
            frmCadClientes.EstadoCivil = eEstCivil.ToString();
            Util.MarcarCampoSexo(frmCadClientes.gbSexo, cliente.Sexo);
            frmCadClientes.txtRG.Text = cliente.RG.ToString();
            frmCadClientes.mtxtCPF.Text = cliente.CPF.ToString();
            frmCadClientes.txtPais.Text = cliente.Pais;
            frmCadClientes.txtEstado.Text = cliente.Estado;
            frmCadClientes.txtCidade.Text = cliente.Cidade;
            frmCadClientes.txtBairro.Text = cliente.Bairro;
            frmCadClientes.txtCEP.Text = cliente.CEP;
            frmCadClientes.txtLogradouro.Text = cliente.Logradouro;
            frmCadClientes.txtComplemento.Text = cliente.Complemento;
            frmCadClientes.txtNumero.Text = cliente.Numero.ToString();
            frmCadClientes.txtTelefone1.Text = cliente.listaTelefones[0];
            frmCadClientes.txtTelefone2.Text = cliente.listaTelefones[1];
            frmCadClientes.txtCelular1.Text = cliente.listaTelefones[2];
            frmCadClientes.txtCelular2.Text = cliente.listaTelefones[3];
            frmCadClientes.Show();
        }
    }
}