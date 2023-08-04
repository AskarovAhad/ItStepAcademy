#include <iostream>
#include <string>
using namespace std;

int Find(string s, int& st);
void Sort(string& a);
void Sum(string& s);

int main() {
	string text;
	getline(cin, text);
	Sum(text);
	cout << text;
	return 0;
}

int Find(string s, int& st) {
	string n = { "*/+-" };
	for (int i = st; i < s.size(); ++i) {
		for (int j = 0; j < 4; ++j) {
			if (s[i] == n[j] && isdigit(s[i - 1]) && isdigit(s[i + 1])) {
				st = i;
				return j;
			}
		}
	}
	return -1;
}

void Sort(string& a) {
	int size = a.size();
	for (int i = 0; i < size / 2; ++i) {
		swap(a[i], a[size - i - 1]);
	}
}

void Sum(string& s) {
	int k = 0;
	do {
		string a, b;
		int ind1 = 0, ind2 = 0;
		int index = Find(s, k);
		if (index != -1) {
			for (int i = k + 1; i < s.size(); ++i) {
				if (isdigit(s[i])) {
					b.push_back(s[i]);
					ind1 = i;
				}
				else {
					break;
				}
			}
			for (int j = k - 1; j >= 0; --j) {
				if (isdigit(s[j])) {
					a.push_back(s[j]);
					ind2 = j;
				}
				else {
					break;
				}
			}
			Sort(a);
			if (index == 2) s.replace(s.begin() + ind2, s.begin() + ind1 + 1, to_string(stoi(a) + stoi(b)));
			else if (index == 3) s.replace(s.begin() + ind2, s.begin() + ind1 + 1, to_string(stoi(a) - stoi(b)));
			else if (index == 0) s.replace(s.begin() + ind2, s.begin() + ind1 + 1, to_string(stoi(a) * stoi(b)));
			else if (index == 1) s.replace(s.begin() + ind2, s.begin() + ind1 + 1, to_string(stoi(a) / stoi(b)));
		}
	} while (Find(s, k) != -1);
}
