#include <iostream>
#include <string>
using namespace std;

void Highlight(string& text, string& highlight) {
	size_t brackets = text.find(highlight);
	while (brackets != string::npos) {
		text.insert(text.begin() + brackets, '(');
		text.insert(text.begin() + brackets + 1 + highlight.size(), ')');
		brackets = text.find(highlight, brackets + 2);
	}
}

int main() {
	string text, highlight;
	cout << "Enter the text: " << endl;
	getline(cin, text);
	cout << "Enter what you want to highlight: " << endl;
	getline(cin, highlight);
	Highlight(text, highlight);
	cout << text;
	return 0;
}