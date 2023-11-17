package com.lmo.appfilmes;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.List;

public class AdapterFilme extends BaseAdapter {
    private List<Filme> listaFilmes;
    private Context context;
    private LayoutInflater inflater;

    public AdapterFilme(Context context, List<Filme> listaFilmes){
        this.listaFilmes = listaFilmes;
        this.context = context;
        this.inflater = LayoutInflater.from(context);
    }

    @Override
    public int getCount() {
        return listaFilmes.size();
    }

    @Override
    public Object getItem(int i) {
        return listaFilmes.get( i );
    }

    @Override
    public long getItemId(int i) {
        return listaFilmes.get( i ).id;
    }

    @Override
    public View getView(int position, View view, ViewGroup viewGroup) {
        ItemHelper item;
        if(view == null){
            view = inflater.inflate(R.layout.layout_lista,null);
            item = new ItemHelper();
            item.tvNome = view.findViewById(R.id.tvListaNome);
            item.tvAno = view.findViewById(R.id.tvListaAno);
            item.layout = view.findViewById(R.id.llFundoLista);
            view.setTag(item);
        }else{
            item = (ItemHelper) view.getTag();
        }
        Filme filme = listaFilmes.get(position);
        item.tvNome.setText(filme.nome);
        item.tvAno.setText(filme.getAno());
        if(position % 2 == 0){
            item.layout.setBackgroundColor(Color.rgb(230,230,230));
        }else{
            item.layout.setBackgroundColor(Color.WHITE);
        }
        return view;
    }

    private class ItemHelper{
        TextView tvNome;
        TextView tvAno;
        LinearLayout layout;
    }
}
