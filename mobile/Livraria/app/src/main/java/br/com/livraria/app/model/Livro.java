package br.com.livraria.app.model;

import java.io.Serializable;

/**
 * Created by 15160055 on 10/05/2016.
 */
public class Livro implements Serializable {

       private int cod_livro;
       private String foto_livro;
       private String nome_livro;
       private String desc_livro;
       private Double preco_livro;
       private String nome_autor;

    public int getCod_livro() {
        return cod_livro;
    }

    public void setCod_livro(int cod_livro) {
        this.cod_livro = cod_livro;
    }

    public String getFoto_livro() {
        return foto_livro;
    }

    public void setFoto_livro(String foto_livro) {
        this.foto_livro = foto_livro;
    }

    public String getNome_livro() {
        return nome_livro;
    }

    public void setNome_livro(String nome_livro) {
        this.nome_livro = nome_livro;
    }

    public String getDesc_livro() {
        return desc_livro;
    }

    public void setDesc_livro(String desc_livro) {
        this.desc_livro = desc_livro;
    }

    public Double getPreco_livro() {
        return preco_livro;
    }

    public void setPreco_livro(Double preco_livro) {
        this.preco_livro = preco_livro;
    }


    public String getNome_autor() {
        return nome_autor;
    }

    public void setNome_autor(String nome_autor) {
        this.nome_autor = nome_autor;
    }


}
