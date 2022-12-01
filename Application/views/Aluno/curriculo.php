<?php

 foreach ($data['alunos'] as $key => $aluno) { 
    header('Content-type: application/pdf');
   echo $aluno['curriculo']; 
 }

