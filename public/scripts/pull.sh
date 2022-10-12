cd ..
echo $PWD
echo start pulling 
git fetch --all >fetch.txt
git pull --all >pull.txt
cat pull.txt
cat fetch.txt
echo Done
php artisan route:cache
