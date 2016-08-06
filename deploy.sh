#! /bin/bash
$DIST_DIR = dist
if [ -n "$1" ]; then
    echo "building to $DIST_DIR..."
    gulp
    echo "copying files from $DIST_DIR to $1..."
    rsync -azP ./$DIST_DIR/ $1
else
    echo "Usage:"
    echo "  ./deply.sh remote-destination"
    echo ""
    echo "For example:"
    echo "  ./deploy.sh your-netid@ovid.u.washington.edu:public_html/tutorials"
    exit 1
fi
