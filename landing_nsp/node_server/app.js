import express, { json } from "express";
import {log} from "console"
import cors from "cors";
import multer from 'multer';
import bot_api from 'node-telegram-bot-api'

const api_key_bot = '';

const bot = new bot_api(api_key_bot,{
    polling:true
});


const mes_bot = async mess=>{
    bot.sendMessage('token', mess );
}; 

const app = express();
const PORT = 3500;
app.use(cors());
гну


app.post("/form",upload.none(),(req, res)=>{

    const jsonData = req.body;

    (jsonData != null || jsonData != undefined)? res.status(200).send("successfully"): res.status(400).send("error!");
    const order = "Новый заказ!\n"+"Имя: "+jsonData.firstName+"\n Фамилия: "+
    jsonData.lastName + "\n Телефон: "+jsonData.phone+"\n";
    try{
        mes_bot(order);
    }
    catch(err){
        log(err);
    }
});

const server = app.listen(PORT, (err)=>{
    if(err){
        log("server fatal! "+ err);
    }
    else{
        log("server start, ok!")
    }
});