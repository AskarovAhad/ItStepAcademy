#include <iostream>
#include <iomanip>

using namespace std;

void Print(int k, ...) {
	int* ptr = &k;
	int size = 0;
	while (*ptr) {
		cout << setw (4) << " - "<< *(ptr++);
	}
	cout << endl;
}

int main() {
	Print(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 0);
	return 0;
}