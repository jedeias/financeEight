<?php

include("C:/laragon/www/financeEight/app/autoload.php");

$pessoa = Pessoas::construct("1234567890123", "backTest@backtest.com", "123456789", "2000-05-22");
$pk = (10);

$pessoa->setPkPessoa($pk);

testSave($pessoa);
testUpdate($pessoa);
testDelete($pk);
testGetById($pessoa, $pk);
testGetAll();


function testSave($pessoa){
    
    $repository = new RepositoryPessoas();

    $response = $repository->save($pessoa);
    if ("save success" == $response){
        echo "SAVE OK";
    }else{
        echo "SAVE FAILL";
    }
}

function testGetById($pessoa, $pk){
    $repository = new RepositoryPessoas();

    $response = $repository->getById($pk);
    
    if($pk == $response["pkPessoa"]){
        echo "GETBYID OK";
    }else{
        echo "GETBYID FAILED";
    }

}

function testGetAll(){
    $repository = new RepositoryPessoas();

    $response = $repository->getAll();

    if(is_array($response) && !empty($response)){
        print_r($response);
    }else{
        echo "GETALL FAILED";
    }
}

function testUpdate($pessoa){
    $repository = new RepositoryPessoas();

    $pessoa->setPassword("654321");

    $response = $repository->update($pessoa);

    if($response == "update success"){
        echo "UPDATE SUCCESSFUL";
    }else{
        echo "UPDATE FAILED";
    }
}

function testDelete(int $id){
    
    $repository = new RepositoryPessoas();

    $response = $repository->delete($id);

    if($response == "delete success"){
        echo "DELETE SUCCESSFUL";
    }else{
        echo "DELETE FAILED";
    }
}