#! /bin/bash
if [ -n "$1" ]; then
    echo "building to build/..."
    gulp
    echo "copying files from build/ to $1..."
    rsync -azP ./build/ $1
else
    echo "Usage:"
    echo "  ./deply.sh remote-destination"
    echo ""
    echo "For example:"
    echo "  ./deploy.sh your-netid@ovid.u.washington.edu:public_html/tutorials"
    exit 1
fi
