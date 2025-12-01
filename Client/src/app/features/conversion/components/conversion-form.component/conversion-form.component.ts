import { Component, EventEmitter, Output } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-conversion-form',
  imports: [FormsModule],
  templateUrl: './conversion-form.component.html',
  styleUrl: './conversion-form.component.scss',
})
export class ConversionFormComponent {
  amount: number | null = null;
  errorMessage: string = '';

  @Output() amountSent = new EventEmitter<number>();
  @Output() errorOccurred = new EventEmitter<void>();
  onSubmit() {
    if (!this.amount|| this.amount <= 0) {
      this.errorMessage = 'Podana wartość musi być liczbą większą od 0';
      this.errorOccurred.emit();
      return;
    }
    this.errorMessage = '';
    this.amountSent.emit(this.amount);
  }
}
