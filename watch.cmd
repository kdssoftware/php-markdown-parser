@ECHO OFF
:loop
  cls
  git pull
  git add ./*
  git stage ./*
  git commit -m "update"
  git push
  timeout /t 1 > NUL
goto loop