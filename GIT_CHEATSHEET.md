# Git Cheatsheet

## To clone a github repository
git clone https://github.com/yakotta/luxemanagers.git

## To setup your github credentials so they are stored for one year
git config --global credential.helper cache
git config --global credential.helper 'cache --timeout=31557600'

## To add files to the git repository
* To add all the current changes to every file (be careful!)
    - git add .
* To add a specific file
    - git add README.md

## Finally, commit those files into the repository
git commit -m "Put your message here that describes the changes"

## Then push your commits to github
git push origin master

The first time git should ask for your username and 
password, it should store them after that