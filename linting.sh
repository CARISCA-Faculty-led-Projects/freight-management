#!/bin/bash

# Set the root directory where you want to search for files (current directory)
ROOT_DIR="resources/views"

# Find all files containing "src="assets/" and update the occurrences
find "$ROOT_DIR" -type f -name "*.php" -o -name "*.blade.php" | while read -r FILE; do
    # Use sed to replace the occurrences of "src="assets/" with "src="{{ asset('assets/') }}"
    sed 's|<img src="assets/\(.*\)" alt="" />|<img src="{{ asset('\''assets/\1'\'') }}" alt="" />|g' "$FILE" > "$FILE.tmp"
    mv "$FILE.tmp" "$FILE"
done

# Print the message after linting is complete
echo "Linting complete!"
