<?php
include '../model/connection.php';
include '../model/config.php';

    try {
        $pdo->beginTransaction();
        //$query=
        $sentencia1=$pdo->prepare("INSERT INTO 'tbl_participante' ('id_paricipante', 'dni_participante', 'nombre', 'apellido1', 'apellido2', 'fecha_naci', 'email', 'sexe') VALUES (NULL,?,?,?,?,?,?,?);");
        //$sentencia1=$pdo->prepare($query);
            $dni=$_REQUEST['fdni'];
            $nom=$_REQUEST['fnom'];
            $prmier=$_REQUEST['fprimer'];
            $segon=$_REQUEST['fsegon'];
            $email=$_REQUEST['femail'];
            $sexe=$_REQUEST['fsexe'];
            $data=$_REQUEST['fdata'];
            //$categoria=$_REQUEST['fcategoria'];
        $sentencia1->bindParam(1,$dni);
        $sentencia1->bindParam(2,$nom);
        $sentencia1->bindParam(3,$primer);
        $sentencia1->bindParam(4,$segon);
        $sentencia1->bindParam(5,$data);
        $sentencia1->bindParam(6,$email);
        $sentencia1->bindParam(7,$sexe);
        $sentencia1->execute();
        $pdo->commit(); //hace todas las sentencias

        echo 'todo bien';
        //header('Location: ../view/inscripcion.html');


    } catch (Exception $ex) {
        /* Reconocer un error y no hacer los cambios */
        $pdo->rollback();
        echo $ex->getMessage();
        echo 'error';
    }