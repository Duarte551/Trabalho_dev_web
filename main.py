import flask
from flask import Flask, request, jsonify
import pymongo
from pymongo import MongoClient
import json

app = flask.Flask(__name__)
app.config["DEBUG"] = True

client = MongoClient("mongodb://localhost:27017/")

db = client['local']
colecao = db['Livraria']

@app.route('/livros', methods=['Get'])
def ver_livros():
    livros = db.colecao.find()
    livros_json = list(livros)

    return flask.jsonify([livro for livro in livros_json])

@app.route('/livros/<int:id>', methods=['GET'])
def ver_livro_por_id(id):
    livro = db.colecao.find_one({'_id': id})

    return livro

@app.route('/livros/<int:id>', methods=['PUT'])
def editar_livro_id(id):
    print("Tá lendo?")
    liv_alt = request.get_json()
    livro_alterado = db.colecao.find_one_and_update(
        {'_id': id},
        {'$set':{'titulo': liv_alt['titulo'], 'email': liv_alt['email'], 'usuario': liv_alt['usuario']}}
    )   
    print("Chegou aqui")
    return livro_alterado

@app.route('/livros', methods=['POST'])
def incluir_livro():
    novo_livro = request.get_json()
    db.colecao.insert_one(novo_livro)

    print("Teste")

    return flask.jsonify(message="Adicionado com sucesso!!")

@app.route('/livros/<string:email>&&<string:senha>', methods=['GET'])
def ver_usuario(email, senha):
    user = db.colecao.find_one({'email': email, 'senha': senha})
    if user:
        return user
    
    else: 
        return flask.jsonify(message="Usuário Não encontrado!!")

@app.route('/livros/<int:id>', methods=['DELETE'])
def excluir_livro(id):
    db.colecao.delete_one({'_id': id})
    
    return flask.jsonify(message="Removido com sucesso!!")

if __name__ == '__main__':
    app.run()
    