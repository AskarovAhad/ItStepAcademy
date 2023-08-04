//#include <iostream>
//#include <list>
//#include <string>
//
//using namespace std;
//
//class List {
//	list <int> l;
//	int size = 0;
//public:
//	void Add(int i) {
//		l.push_back(i);
//		++size;
//		if (size > 10) throw "So many values";
//	}
//	void Delete() {
//		if (size == 0) throw logic_error("Nothing to delete");
//		auto it = l.begin(); l.erase(it);
//	}
//};
//
//int main() {
//	try {
//		List a;
//		a.Delete();
//	}
//	//catch (const char* a) { // 2 задание для иерархии исключений
//	//	cout << a << endl;
//	//}
//	catch (exception &a) {
//		cout << a.what();
//	}
//	return 0;
//}