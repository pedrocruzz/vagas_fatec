<?php

 foreach ($data['alunos'] as $key => $aluno) { 
  if(!EMPTY($aluno)){
    header('Content-type: application/pdf');
   @readfile($aluno['curriculo']); 
  }
 }

