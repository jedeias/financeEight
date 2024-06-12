<?php

include("C:/laragon/www/financeEight/app/autoload.php");

$cartao = Cartoes::construct("1234567898", "2028-05-20", "1234567894");
$pk = 4;
$cartao->setPkCartoes($pk);

$repository = new repositoryCartoes();

$response = $repository->getById(5);

print_r($response);

// testSave($cartao);

// $cartao->setNumero("000123456789");

// echo "\n";
// testUpdate($cartao);

// echo "\n";

testDelete($pk);

function testSave(Cartoes $cartao){
    
    $repository = new repositoryCartoes();

    $response = $repository->save($cartao);
    
    if("save success" == $response){
        echo "SAVE SUCCESSFUL";
    }else{
        echo "SAVE FAILLD";
    }
    
}

function testUpdate(Cartoes $cartao){
    $repository = new repositoryCartoes();
    
    $response = $repository->update($cartao);
    
    if("update success" == $response){
        echo "UPDATE SUCCESSFUL";
    }else{
        echo "UPDATE FAILLD";
    }
}

function testDelete($pk){
    
    $repository = new repositoryCartoes();

    $response = $repository->delete($pk);
    
    if("delete success" == $response){
        echo "DELETE SUCCESSFUL";
    }else{
        echo "DELETE FAILLD";
    }
    
}

