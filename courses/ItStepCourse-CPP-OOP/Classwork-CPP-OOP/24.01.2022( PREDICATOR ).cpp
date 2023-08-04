#include <iostream>
#include <list>
#include <iterator>
using namespace std;

bool isEven(int num) {
	return bool(num % 2);
}

int main() {
	list<int>l;
	list<int>::iterator it;
	for (int i = 1; i < 10; i++) {
		l.push_back(i);
	}
	copy(l.begin(), l.end(), ostream_iterator<int>(cout, " "));
	cout << endl;
	it = remove_if(l.begin(), l.end(), isEven);
	copy(l.begin(), it, ostream_iterator<int>(cout, " "));

	return 0;
}