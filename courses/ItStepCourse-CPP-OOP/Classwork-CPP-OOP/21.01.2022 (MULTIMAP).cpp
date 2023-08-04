//https://en.cppreference.com/w/cpp/container/map
#include <iostream>
#include <vector>
#include <iterator>
#include <algorithm>
#include <list>
#include <map>
using namespace std;
template<typename T>
void ShowMap(T t) {
	for (typename T::const_iterator it = t.begin(); it != t.end(); it++) {
		cout << "Key: " << it->first << "Value: " << it->second << endl;
	}
}

//void ShowMap(multimap<string,int> t) {
//	for (multimap<string, int>::iterator it = t.begin(); it != t.end(); it++) {
//		cout << "Key: " << it->first << "  Value: " << it->second << endl;
//	}
//}

int main() {
	multimap<string, int> string_to_int;
	string_to_int.insert(pair<string, int>("Alex", 1));
	string_to_int.insert(pair<string, int>("Bill", 2));
	string_to_int.insert(pair<string, int>("Steve", 5));
	string_to_int.insert(pair<string, int>("Bill", 4));
	ShowMap(string_to_int);

	multimap<string, int>::iterator it = string_to_int.find("Bill");
	cout << it->first << " " << it->second << endl;


	return 0;
}