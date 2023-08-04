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
			cout << "Вы вытянули ВАЛЕТ. Добавлено " << x << " очков\n\n";
			point += x;
			count_2++;
			attemps++;
			return;
		}
		if (x == 3 && count_3 <= 4) {
			system("cls");
			cout << "Вы вытянули ДАМУ. Добавлено " << x << " очков\n\n";
			point += x;
			count_3++;
			attemps++;
			return;
		}
		if (x == 4 && count_4 <= 4) {
			system("cls");
			cout << "Вы вытянули КОРОЛЯ. Добавлено " << x << " очков\n\n";
			point += x;
			count_4++;
			attemps++;
			return;
		}
		if (x == 6 && count_6 <= 4) {
			system("cls");
			cout << "Вы вытянули 6. Добавлено " << x << " очков\n\n";
			point += x;
			count_6++;
			attemps++;
			return;
		}
		if (x == 7 && count_7 <= 4) {
			system("cls");
			cout << "Вы вытянули 7. Добавлено " << x << " очков\n\n";
			point += x;
			count_7++;
			attemps++;
			return;
		}
		if (x == 8 && count_8 <= 4) {
			system("cls");
			cout << "Вы вытянули 8. Добавлено " << x << " очков\n\n";
			point += x;
			count_8++;
			attemps++;
			return;
		}
		if (x == 9 && count_9 <= 4) {
			system("cls");
			cout << "Вы вытянули 9. Добавлено " << x << " очков\n\n";
			point += x;
			count_9++;
			attemps++;
			return;
		}
		if (x == 10 && count_10 <= 4) {
			system("cls");
			cout << "Вы вытянули 10. Добавлено " << x << " очков\n\n";
			point += x;
			count_10++;
			attemps++;
			return;
		}
		if (x == 11 && count_11 <= 4) {
			system("cls");
			cout << "Вы вытянули ТУЗ. Добавлено " << x << " очков\n\n";
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
	cout << "Введите количество игроков: от 2 до 5 --> ";
	cin >> player_count;
	cout << "1 - начать игру\n";
	cin >> answer;
	for (int i = 0; i < player_count; ++i) {
		system("cls");
		cout << "Играет игрок с номером - " << i + 1 << endl;
		cout << "Стартовые очки - 0" << endl;
		cout << "Текущие очки - " << arr[i].getPoint() << endl;
		do {

			cout << "Продолжить тянуть(ещё) - 1" << endl;
			cout << "Перестать тянуть(всё) - 0" << endl;
			cout << "Текущие очки - " << arr[i].getPoint() << endl;
			cin >> answer;
			if (answer == 1) {
				arr[i].upPoint();
				if (Check(arr[i]) == false) {
					cout << "У игрока с номером " << i + 1 << " больше 21 очко. Игрок " << i + 1 << " Проиграл!\n";
					system("pause");
					system("cls");
					break;
				}
			}
			cout << "У игрока " << i + 1 << " - " << arr[i].getPoint() << " очков\n";
		} while (answer != 0);
		cout << endl << endl;
	}
	system("cls");
	cout << "===Результаты игры===" << endl;
	for (int i = 0; i < player_count; ++i) {
		cout << "Игрок " << i + 1 << " " << arr[i].getPoint() << endl;
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
	cout << "Победил игрок с номером " << index + 1 << " и набрал " << arr[index].getPoint() << " очков\n";
	else
	cout << "Победителей нет :(\n";
	return 0;
}
	
	