class AccountObj{
    #name;
    #description;
    #category;
    #data;
    #lang;

    constructor(name, description, category, data, lang){
        this.#name= name;
        this.#description = description;
        this.#category = category;
        this.#data = data;
        this.#lang = lang;
    }

    get name(){
        return this.#name;
    }

    get description(){
        return this.#description;
    }

    get category(){
        return this.#category;
    }

    get data(){
        return this.#data;
    }

    get lang(){
        return this.#lang;
    }

    set name(name){
        this.#name= name;
    }
    set description(description){
        this.#description = description;
    }

    set category(category){
        this.#category= category;
    }

    set data(data){
        this.#data= data;
    }

    set lang(lang){
        this.#lang= lang;
    }
}
