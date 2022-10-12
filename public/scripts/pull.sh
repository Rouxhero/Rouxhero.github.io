cd ..
echo $PWD
echo start pulling 
git fetch --all >pull.txt
git pull --all >>pull.txt
cat pull.txt
echo Done
php artisan route:cache
