#! /bin/bash
echo "building to build/..."
gulp
echo "copying files from build/ to faculty web server..."
rsync -azP ./build/ dlsinfo@ovid.u.washington.edu:public_html/tutorials
