import flask
from flask import Flask, request, jsonify
import pymongo
from pymongo import MongoClient

app = flask.Flask(__name__)
app.config["DEBUG"] = True

client = pymongo.MongoClient("mongodb://localhost:27017")

db = client['local']
colecao = db['Livraria']

@app.route('/livros', methods=['Get'])
def ver_livros():
    livros = db.colecao.find()

    print(list(livros))

    return flask.jsonify(livro for livro in livros)

@app.route('/livros/<int:id>', methods=['GET'])
def ver_livro_por_id(id):
    livro = db.colecao.find_one({'_id': id})
    print(livro)
    return livro

@app.route('/livros/<int:id>', methods=['PUT'])
def editar_livro_id(id):
    liv_alt = request.get_json()
    livro_alterado = db.colecao.find_one_and_update(
        {'_id': id},
        {'$set':{'titulo': liv_alt['titulo']}}
    )   

    return livro_alterado

@app.route('/livros', methods=['POST'])
def incluir_livro():
    novo_livro = request.get_json()
    db.colecao.insert_one(novo_livro)

    return flask.jsonify(message="Adicionado com sucesso!!")

@app.route('/livros/<int:id>', methods=['DELETE'])
def excluir_livro(id):
    db.colecao.delete_one({'_id': id})
    
    return flask.jsonify(message="Removido com sucesso!!")

if __name__ == '__main__':
    app.run()