#!/bin/bash

echo "Building the Vexos project..."
npm run build

echo "Checking the dist directory..."
find dist -type f | sort

if [ -z "$(ls -A dist 2>/dev/null)" ]; then
  echo "dist directory is empty or does not exist. Checking for build issues..."
  echo "Creating dist directory if it doesn't exist..."
  mkdir -p dist
  
  echo "Copying public files to dist..."
  cp -r public/* dist/
  
  echo "Building the project with direct output to dist..."
  npx vite build --outDir=dist --emptyOutDir
  
  echo "Checking dist directory again..."
  find dist -type f | sort
else
  echo "Build successful! Files were created in the dist directory."
fi