using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace CadastroClientes
{
    public class NotificacoesEventArgs : EventArgs
    {
        public string Mensagem { get; set; }
        public string Titulo { get; set; }

        public NotificacoesEventArgs(string mensagem, string titulo) {
            
            Mensagem = mensagem;
            Titulo = titulo;
        }       
    }
}
