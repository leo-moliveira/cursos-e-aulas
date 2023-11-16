package main

import (
	"fmt"
	"os"
	"runtime"
	"sync"
	"time"
)

func main() {
	/*
		WaitGroup
	*/
	//for i := 0; i < 1000; i++ {
	//	go showMessage(strconv.Itoa(i))
	//}
	//time.Sleep(time.Duration(time.Hour.Seconds() * float64(5)))

	//var wg sync.WaitGroup
	//wg.Add(3)
	//
	//go callDataBase(&wg)
	//go callAPI(&wg)
	//go processInternal(&wg)
	//
	//wg.Wait()

	/*
		Mutex
	*/
	//var m sync.Mutex
	//i := 0
	//
	//for x := 0; x < 10000; x++ {
	//	go func() {
	//		m.Lock()
	//		defer m.Unlock()
	//		i++
	//	}()
	//	//go ChangeNumber(&i, x)
	//}
	//
	//time.Sleep(time.Second * 2)
	//fmt.Println(i)
	//wg.Wait()

	/*
		channel
	*/
	//channel := make(chan int)
	//
	////var list []int
	//
	//go setList(channel)
	//
	////valor := <- channel
	//
	//for v := range channel {
	//	fmt.Println(v)
	//}

	/*
		channel buffer
	*/
	channel := make(chan int, 100)

	//var list []int

	go setList(channel)

	//valor := <- channel

	for v := range channel {
		fmt.Println("recebendo: ", v)
		time.Sleep(time.Second)
	}
}

func setList(channel chan int) {
	for i := 0; i <= 100; i++ {
		channel <- i
		fmt.Println("enviando: ", i)
		//*(list) = append((*list), i)
	}
	close(channel)
}

func showMessage(message string) {
	fmt.Println(message)
}

func callDataBase(wg *sync.WaitGroup) {
	time.Sleep(1 * time.Second)

	showMessage("Finalizado " + currentFunction())
	wg.Done()
}

func callAPI(wg *sync.WaitGroup) {
	time.Sleep(2 * time.Second)
	showMessage("Finalizado " + currentFunction())
	wg.Done()
}

func processInternal(wg *sync.WaitGroup) {
	time.Sleep(1 * time.Second)
	showMessage("Finalizado " + currentFunction())
	wg.Done()
}

func currentFunction() string {
	counter, _, _, success := runtime.Caller(1)

	if !success {
		println("functionName: runtime.Caller: failed")
		os.Exit(1)
	}

	return runtime.FuncForPC(counter).Name()
}

func ChangeNumber(i *int, newNumber int) {
	*i = newNumber
}
