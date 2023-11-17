using CadastroClientes.Entidades;
using System;
using System.Collections.Generic;

namespace CadastroClientes.Aplicacao
{
    public class Notificacoes
    {
        public event EventHandler<NotificacoesEventArgs> RaiseNotificacoesEvent;       

        public void Nova(string mensagem, string titulo) {
            RaiseNotificacoesEvent += Util.HandleNotificacoesEvent;

            Notificacao notificacao = new Notificacao();
            notificacao.Titulo = titulo;
            notificacao.Mensagem = mensagem;

            OnRaiseNotificacoesEvent(new NotificacoesEventArgs(mensagem, titulo));
        }       

        private void OnRaiseNotificacoesEvent(NotificacoesEventArgs e) {
            EventHandler<NotificacoesEventArgs> raiseEvent = RaiseNotificacoesEvent;

            if (raiseEvent != null) {
                RaiseNotificacoesEvent += Util.HandleNotificacoesEvent;

                raiseEvent(this, e);
            }
        }
    }
}