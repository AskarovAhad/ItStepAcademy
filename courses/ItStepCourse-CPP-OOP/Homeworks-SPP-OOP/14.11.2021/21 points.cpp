#include <iostream>
#include <stdlib.h>
#include <time.h>

using namespace std;

class Points {
	int point;
	int attemps;
	int count_2 = 0;
	int count_3 = 0;
	int count_4 = 0;
	int count_6 = 0;
	int count_7 = 0;
	int count_8 = 0;
	int count_9 = 0;
	int count_10 = 0;
	int count_11 = 0;
public:
	friend bool Check(Points a);
	Points() : point{ 0 } { }
	Points(int _point) : point{ _point } { }
	int getPoint() {
		return point;
	}
	int getAttemps() {
		return attemps;
	}
	void setPoint(int _point) {
		point = _point;
	}
	void upPoint() {
		int x = rand() % 11 + 1;
		if (x == 2 && count_2 <= 4) {
			system("cls");
			cout << "�� �������� �����. ��������� " << x << " �����\n\n";
			point += x;
			count_2++;
			attemps++;
			return;
		}
		if (x == 3 && count_3 <= 4) {
			system("cls");
			cout << "�� �������� ����. ��������� " << x << " �����\n\n";
			point += x;
			count_3++;
			attemps++;
			return;
		}
		if (x == 4 && count_4 <= 4) {
			system("cls");
			cout << "�� �������� ������. ��������� " << x << " �����\n\n";
			point += x;
			count_4++;
			attemps++;
			return;
		}
		if (x == 6 && count_6 <= 4) {
			system("cls");
			cout << "�� �������� 6. ��������� " << x << " �����\n\n";
			point += x;
			count_6++;
			attemps++;
			return;
		}
		if (x == 7 && count_7 <= 4) {
			system("cls");
			cout << "�� �������� 7. ��������� " << x << " �����\n\n";
			point += x;
			count_7++;
			attemps++;
			return;
		}
		if (x == 8 && count_8 <= 4) {
			system("cls");
			cout << "�� �������� 8. ��������� " << x << " �����\n\n";
			point += x;
			count_8++;
			attemps++;
			return;
		}
		if (x == 9 && count_9 <= 4) {
			system("cls");
			cout << "�� �������� 9. ��������� " << x << " �����\n\n";
			point += x;
			count_9++;
			attemps++;
			return;
		}
		if (x == 10 && count_10 <= 4) {
			system("cls");
			cout << "�� �������� 10. ��������� " << x << " �����\n\n";
			point += x;
			count_10++;
			attemps++;
			return;
		}
		if (x == 11 && count_11 <= 4) {
			system("cls");
			cout << "�� �������� ���. ��������� " << x << " �����\n\n";
			point += x;
			count_11++;
			attemps++;
			return;
		}
		upPoint();
	}
};

bool Check(Points a) {
	if (a.point <= 21) return true;
	else return false;
}

int main() {
	srand(time(NULL));
	setlocale(0, "");
	Points* arr = new Points[5];
	int answer;
	int player_count;
	cout << "������� ���������� �������: �� 2 �� 5 --> ";
	cin >> player_count;
	cout << "1 - ������ ����\n";
	cin >> answer;
	for (int i = 0; i < player_count; ++i) {
		system("cls");
		cout << "������ ����� � ������� - " << i + 1 << endl;
		cout << "��������� ���� - 0" << endl;
		cout << "������� ���� - " << arr[i].getPoint() << endl;
		do {

			cout << "���������� ������(���) - 1" << endl;
			cout << "��������� ������(��) - 0" << endl;
			cout << "������� ���� - " << arr[i].getPoint() << endl;
			cin >> answer;
			if (answer == 1) {
				arr[i].upPoint();
				if (Check(arr[i]) == false) {
					cout << "� ������ � ������� " << i + 1 << " ������ 21 ����. ����� " << i + 1 << " ��������!\n";
					system("pause");
					system("cls");
					break;
				}
			}
			cout << "� ������ " << i + 1 << " - " << arr[i].getPoint() << " �����\n";
		} while (answer != 0);
		cout << endl << endl;
	}
	system("cls");
	cout << "===���������� ����===" << endl;
	for (int i = 0; i < player_count; ++i) {
		cout << "����� " << i + 1 << " " << arr[i].getPoint() << endl;
	}
	int index = 0;
	for (int i = 0; i < player_count; i++) {
		int count = 0;
		if (arr[i].getPoint() <= 21 && count >= count) {
			index = i;
			count = arr[i].getPoint();
		}
	}
	if(index > 0)
	cout << "������� ����� � ������� " << index + 1 << " � ������ " << arr[index].getPoint() << " �����\n";
	else
	cout << "����������� ��� :(\n";
	return 0;
}
	
	